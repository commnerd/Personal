import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { LaravelModelService } from "@services/models/laravel_model.service";
import { Post } from "@interfaces/blog/post";

@Injectable({
  providedIn: 'root'
})
export class BlogService extends LaravelModelService<Post> {

  protected path = '/api/blog';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
