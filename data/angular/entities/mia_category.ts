import { MiaModel } from "@agencycoda/mia-core";

export class MiaCategory extends MiaModel {
    id: number = 0;
    title: string = '';
    slug: string = '';
    status: number = 0;
    icon: string = '';
    type: number = 0;
    is_featured: number = 0;

}