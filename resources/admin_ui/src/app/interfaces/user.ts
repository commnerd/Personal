import { LaravelModel } from './laravel/model';

export interface User extends LaravelModel {
    name: string;
    email: string;
}