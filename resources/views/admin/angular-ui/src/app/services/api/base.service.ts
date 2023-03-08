import { Observable } from 'rxjs';

import { Paginated } from ''

export abstract class BaseService<T> {
  protected endpoint: string = '';

  constructor() { }

  list(): Observable<Paginated<T>> {

  }
}
