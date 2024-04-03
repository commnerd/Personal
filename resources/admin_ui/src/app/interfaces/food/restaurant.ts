import { Model as LaravelModel } from "../laravel/model";

export interface Restaurant extends LaravelModel {
  name: string,
}
