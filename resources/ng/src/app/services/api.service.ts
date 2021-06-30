import {HttpClient} from "@angular/common/http";
import { Injectable } from '@angular/core';
import { Observable } from "rxjs";

import { Endpoint } from "@interfaces/api/endpoint";
import { environment } from "@environment";
import { Quote } from "@models/quote";
import {PagedResponse} from "@interfaces/api/paged-response";

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private url: string = `${environment.api.scheme}://${environment.api.uri}`;

  public readonly resource: {[label: string]: Endpoint<any>} = {
    "quotes": new QuoteEndpoint(this)
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
    this.url += '/api/v1';
  }

  call<T>(endpoint: Endpoint<any>, method: string, options?:any[]): Observable<T> {
    switch(method) {
      case "get":
        return this.http.get<T>(`${this.url}/${endpoint.path}`);
    }
    throw `Function "${method}" not defined in HttpClient.`;
  }
}

class QuoteEndpoint implements Endpoint<Quote> {
  constructor(private svc: ApiService) {}

  path: string = "quotes";

  verbs: string[] = ["index"];

  index(): Observable<PagedResponse<Quote>> {
    return this.svc.call<PagedResponse<Quote>>(this, "index")
  }
}
