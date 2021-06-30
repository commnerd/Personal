import {Observable} from "rxjs";
import {PagedResponse} from "@interfaces/api/paged-response";

export interface Endpoint<T> {
  path: string;
  index?: () => Observable<PagedResponse<T>>;
}
