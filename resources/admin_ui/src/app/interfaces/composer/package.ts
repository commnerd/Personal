import { Model as LaravelModel } from "../laravel/model";

export interface Package extends LaravelModel {
    name: string,
    version: string,
    type: string,
}