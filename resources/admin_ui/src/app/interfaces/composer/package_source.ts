import { Model as LaravelModel } from "../laravel/model";

export interface PackageSource extends LaravelModel {
    reference: string;
    type: string;
    url: string;
}
