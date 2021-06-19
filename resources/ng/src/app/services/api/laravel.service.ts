import { Injectable } from '@angular/core';

import { ApiService } from "@services/api/api.service";
import { Endpoint } from "@interfaces/api/resource";

@Injectable({
  providedIn: 'root'
})
export class LaravelService extends ApiService {

  protected basePath = '/api/v1';

  protected endpointMap = new Map<string, Endpoint>({
    "quotes":
  });

  constructor() {
    super();
  }
}
