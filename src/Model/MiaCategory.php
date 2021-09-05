<?php

namespace Mia\Category\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $title Description for variable
 * @property mixed $slug Description for variable
 * @property mixed $status Description for variable
 * @property mixed $icon Description for variable
 * @property mixed $type Description for variable
 * @property mixed $is_featured Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="slug",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="status",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="icon",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="type",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="is_featured",
 *  type="integer",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaCategory extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_category';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;    
}