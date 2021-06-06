import {Observable} from "rxjs";

import {PagedResponse} from "@interfaces/api/paged-response";

export interface Endpoint<T> {
  uri: string;
  list?: () => Observable<PagedResponse<T>>;
  get?: (id: string | number) => Observable<T>;
  save?: () => Observable<T>;
  delete?: () => Observable<T>;
}
