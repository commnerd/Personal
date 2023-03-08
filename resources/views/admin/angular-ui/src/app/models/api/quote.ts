import { Model } from "./laravel/model";

export interface Quote extends Model{
    source: string;
    quote: string;
}