import { Model as LaravelModel } from "../laravel/model";
import {Order} from "@interfaces/food/order";

export interface Restaurant extends LaravelModel {
  name: string,
  orders?: Array<Order>,
}
