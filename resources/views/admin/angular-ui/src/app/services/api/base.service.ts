import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Paginated } from '@models/api/laravel/paginated';
import { Model as LaravelModel } from '@models/api/laravel/model';
import { Id } from '@models/api/laravel/id';


export abstract class BaseService<T extends LaravelModel> {
  protected endpoint: string = '';

  constructor(
    protected httpClient: HttpClient 
  ) { }

  public list(): Observable<Paginated<T>> {
    return this.httpClient.get<Paginated<T>>(this.endpoint);
  }

  public get(id: Id): Observable<T> {
    return this.httpClient.get<T>(this.endpoint);
  }

  public save(obj: T): Observable<T> {
    if(obj.id) {
      return this.httpClient.put<T>(this.endpoint, obj);
    } 
    return this.httpClient.post<T>(this.endpoint, obj);
  }

  public delete(id: Id): Observable<boolean> {
    return this.httpClient.delete<boolean>(this.endpoint);
  }
}
