import { Model as LaravelModel } from './laravel/model';

export interface Drink extends LaravelModel {
  name: string;
  recipe: string;
}
