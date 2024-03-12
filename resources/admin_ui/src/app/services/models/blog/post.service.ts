import { Injectable } from '@angular/core';
import { LaravelModelService } from "@services/models/laravel_model.service";
import { Post } from "@interfaces/blog/post";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class PostService extends LaravelModelService<Post> {

  protected path = '/api/blog/posts';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
