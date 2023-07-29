import { LaravelModel } from './laravel_model';

export interface Quote extends LaravelModel {
    active: boolean;
    quote: string;
    source: string;
}