import {Observable} from "rxjs";

export interface Resource<T> {
  index(): Observable<T>;
  store(): Observable<T>;
  update(): Observable<T>;
  destroy(): Observable<T>;

  get(): Observable<T>;
  post(): Observable<T>;
  put(): Observable<T>;
  put(): Observable<T>;
  patch(): Observable<T>;
  delete(): Observable<T>;
  options(): Observable<T>;
}
