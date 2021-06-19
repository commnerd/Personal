import { Observable } from "rxjs";

import { PagedResponse } from "@interfaces/api/paged-response";
import { Endpoint } from "@interfaces/api/endpoint";

export interface LaravelResource<T> extends Endpoint {
  list?: () => Observable<PagedResponse<T>>;
  get?: (id: string | number) => Observable<T>;
  save?: () => Observable<T>;
  delete?: () => Observable<T>;
}
