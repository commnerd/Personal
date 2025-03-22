import { Model as LaravelModel } from './laravel/model';

export interface Reminder extends LaravelModel {
  reference: string;
  reminder: string;
}
