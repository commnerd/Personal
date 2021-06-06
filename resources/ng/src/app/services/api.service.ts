import {HttpClient} from "@angular/common/http";
import { Injectable } from '@angular/core';
import {Observable} from "rxjs";

import { Endpoint } from "@interfaces/api/endpoint";
import { environment } from "@environment";

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private url: string = `${environment.api.scheme}://${environment.api.uri}/api/v1`;
  private callTarget: string = "";

  private resourceMap: {[label: string]: string} = {
    "quotes": "HI"
  };

  constructor(
    private http: HttpClient
  ) {
    if(environment.api.scheme === "http" && environment.api.port !== "80") {
      this.url += `:${environment.api.port}`;
    }
    if(environment.api.scheme === "https" && environment.api.port !== "443") {
      this.url += `:${environment.api.port}`;
    }
  }

  // endpoint(label: string): Endpoint {
  //   let endpoint;
  //
  //   switch(label) {
  //     case "quotes":
  //       this.callTarget = this.url + "/quotes";
  //       break;
  //     default:
  //       throw "Endpoint not defined.";
  //   }
  //   return this;
  // }

  index<T>(): Observable<T> {
    return this.http.get<T>(this.callTarget)
  }

  save<T>(item: T): Observable<T> {
    return this.http.post<T>(this.callTarget, item);
  }

  update<T>(id: number, item: T): Observable<T> {
    return this.http.put<T>(`${this.callTarget}/${id}`, item);
  }

  delete<T>(id: number): Observable<T> {
    return this.http.delete<T>(`${this.callTarget}/${id}`);
  }
}
