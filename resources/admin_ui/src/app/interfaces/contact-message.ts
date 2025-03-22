import { Model as LaravelModel } from './laravel/model';

export interface ContactMessage extends LaravelModel {
  name: string;
  email_phone: string;
  message: string;
}
