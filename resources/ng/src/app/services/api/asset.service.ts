import { Injectable } from '@angular/core';

import { ApiService } from "@services/api/api.service";
import { Endpoint } from "@interfaces/api/resource";

@Injectable({
  providedIn: 'root'
})
export class AssetService extends ApiService {

  protected basePath = '/ng/assets';

  protected endpointMap = new Map<string, Endpoint>();

  constructor() {
    super();
  }
}
