import { Model as LaravelModel } from "../laravel/model";

export interface PackageSource extends LaravelModel {
    composer_package_id: number;
    reference: string;
    type: string;
    url: string;
}
