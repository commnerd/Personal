import { Injectable } from '@angular/core';
import { LaravelModelService } from "@services/models/laravel_model.service";
import { Package } from "@interfaces/composer/package";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class PackageSourceService extends LaravelModelService<Package> {

  protected path = '/api/composer/package-sources';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
