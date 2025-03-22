import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Package } from '@interfaces/composer/package';
import { LaravelModelService } from "../laravel_model.service";

@Injectable({
  providedIn: 'root'
})
export class PackageService extends LaravelModelService<Package> {

  protected path = '/api/composer/packages';
  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
