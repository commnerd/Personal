import { TestBed } from '@angular/core/testing';

import { PackageSourceService } from './package-source.service';

describe('PackageSourceService', () => {
  let service: PackageSourceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PackageSourceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
