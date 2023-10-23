import { TestBed } from '@angular/core/testing';

import { PackageService } from './package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';

describe('PackageService', () => {
  let service: PackageService;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [HttpClient, HttpHandler]
    });
    service = TestBed.inject(PackageService);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
