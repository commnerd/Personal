import { Model as LaravelModel } from './laravel/model';

export interface Quote extends LaravelModel {
    active: boolean;
    quote: string;
    source: string;
}