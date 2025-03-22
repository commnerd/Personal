import { TestBed } from '@angular/core/testing';

import { PackageService } from './package.service';
import { HttpClientTestingModule } from "@angular/common/http/testing";

describe('PackageService', () => {
  let service: PackageService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule]
    });
    service = TestBed.inject(PackageService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
