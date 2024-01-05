import { TestBed } from '@angular/core/testing';

import { PackageSourceService } from './package-source.service';
import { HttpClient, HttpHandler } from "@angular/common/http";

describe('PackageSourceService', () => {
  let service: PackageSourceService;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [HttpClient, HttpHandler]
    });
    service = TestBed.inject(PackageSourceService);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
