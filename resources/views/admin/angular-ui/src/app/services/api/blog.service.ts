import { BaseService } from './base.service';
import { BlogPost } from '@models/api/blog-post';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
@Injectable({
  providedIn: 'root'
})
export class BlogService extends BaseService<BlogPost>{
  protected override endpoint: string = '/api/blog';
  constructor(protected override httpClient: HttpClient ) {
    super(httpClient);
  }
}
