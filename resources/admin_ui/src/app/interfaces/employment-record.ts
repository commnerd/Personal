import { Model as LaravelModel } from './laravel/model';

export interface EmploymentRecord extends LaravelModel {
  employer: string;
  position: string;
  location: string;
  bullets: string;
  start_date: Date;
  end_date?: Date;
}
