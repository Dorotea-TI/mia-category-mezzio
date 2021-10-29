<?php

namespace Mia\Category\Handler;

use Mia\Category\Model\MiaCategory;
use Mia\Core\Helper\StringHelper;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia_category/save",
 *     summary="MiaCategory Save",
 *     tags={"MiaCategory"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaCategory")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaCategory")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->title = $this->getParam($request, 'title', '');
        if($item->id == 0){
            $before = MiaCategory::latest()->first();
            $item->slug = ($before !== null ? $before->id : 1) . '-' . StringHelper::createSlug($item->title);
        } else {
            $item->slug = $item->id . '-' . StringHelper::createSlug($item->title);
        }
        $item->status = intval($this->getParam($request, 'status', ''));
        $item->icon = $this->getParam($request, 'icon', '');
        $item->type = intval($this->getParam($request, 'type', ''));
        $item->is_featured = intval($this->getParam($request, 'is_featured', ''));
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaCategory
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Category\Model\MiaCategory::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Category\Model\MiaCategory();
        }
        // Devolvemos item para editar
        return $item;
    }
}