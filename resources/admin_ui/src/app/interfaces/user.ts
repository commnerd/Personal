import { LaravelModel } from './laravel_model';

export interface User extends LaravelModel {
    name: string;
    email: string;
}