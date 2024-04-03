import { Model as LaravelModel } from "../laravel/model";

export interface Order extends LaravelModel {
  restaurant_id?: number,
  active: boolean,
  label: string,
  notes: string,
}
