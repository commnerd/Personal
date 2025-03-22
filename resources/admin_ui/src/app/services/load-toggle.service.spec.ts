import { TestBed } from '@angular/core/testing';

import { LoadToggleService } from './load-toggle.service';

describe('LoadToggleService', () => {
  let service: LoadToggleService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(LoadToggleService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
