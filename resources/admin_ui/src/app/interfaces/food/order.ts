import { Model as LaravelModel } from "../laravel/model";

export interface Order extends LaravelModel {
  restaurant_id?: number,
  label: string,
  notes: string,
}
