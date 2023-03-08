import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

import { Paginated } from '@interfaces/paginated';

export abstract class BaseService<T> {
  protected endpoint: string = '';

  constructor(
    private httpClient: HttpClient 
  ) { }

  list(): Observable<Paginated<T>> {
    return this.httpClient.get(this.endpoint);
  }
}
