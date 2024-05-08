import { TestBed } from '@angular/core/testing';

import { EmploymentRecordService } from './employment-record.service';
import { HttpClientTestingModule } from "@angular/common/http/testing";

describe('EmploymentRecordService', () => {
  let service: EmploymentRecordService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });
    service = TestBed.inject(EmploymentRecordService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
