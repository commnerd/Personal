import { Model as LaravelModel } from "../laravel/model";
import {PackageSource} from "@interfaces/composer/package_source";

export interface Package extends LaravelModel {
    name: string,
    version: string,
    type: string,
    sources: Array<PackageSource>,
}
