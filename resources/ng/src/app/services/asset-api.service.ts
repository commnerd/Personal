import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AssetApiService {
  pathMap: object = {
    routes: '/ng/assets/routes.json'
  };

  constructor() { }
}
