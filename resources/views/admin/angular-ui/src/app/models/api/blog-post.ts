import { Model } from "./laravel/model";

export interface BlogPost extends Model {
    title: string;
    content: string;
}