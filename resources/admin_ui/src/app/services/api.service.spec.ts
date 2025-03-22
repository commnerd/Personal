import { TestBed } from '@angular/core/testing';

import { ApiService } from './api.service';
import { HttpHandler } from '@angular/common/http';

describe('ApiService', () => {
  let service: ApiService;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [HttpHandler]
    });
    service = TestBed.inject(ApiService);
    httpHandler = TestBed.inject(HttpHandler);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
