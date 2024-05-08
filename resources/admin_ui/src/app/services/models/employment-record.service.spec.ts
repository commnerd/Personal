import { TestBed } from '@angular/core/testing';

import { EmploymentRecordService } from './employment-record.service';

describe('EmploymentRecordService', () => {
  let service: EmploymentRecordService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EmploymentRecordService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
