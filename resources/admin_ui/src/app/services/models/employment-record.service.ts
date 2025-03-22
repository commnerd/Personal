import { Injectable } from '@angular/core';
import { LaravelModelService } from "@services/models/laravel_model.service";
import { EmploymentRecord } from "@interfaces/employment-record";
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class EmploymentRecordService extends LaravelModelService<EmploymentRecord> {
  protected path = '/api/work/employment-records';

  constructor(
    override httpClient: HttpClient
  ) {
    super(httpClient);
  }
}
