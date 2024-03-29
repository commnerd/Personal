import { Model as LaravelModel } from "../laravel/model";

export interface Post extends LaravelModel {
  title: string,
  slug: string,
  tags: Array<{display: string, value: string}>,
  body: string,
  published_by?: number,
  published_at?: Date,
  created_by?: number,
}
