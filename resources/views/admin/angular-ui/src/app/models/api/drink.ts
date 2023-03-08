import { Model } from "./laravel/model";

export interface Drink extends Model {
    name: string;
    recipe: string;
}