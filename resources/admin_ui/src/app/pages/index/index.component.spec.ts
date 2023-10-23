import { ComponentFixture, TestBed } from '@angular/core/testing';
import { IndexComponent } from './index.component';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { PackageService } from '../../services/models/composer/package.service';
import { ApiService } from '../../services/api.service';

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let packageService: PackageService;
  let apiService: ApiService;
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [IndexComponent],
      providers: [PackageService, ApiService, HttpClient, HttpHandler]
    });
    fixture = TestBed.createComponent(IndexComponent);
    apiService = TestBed.inject(ApiService);
    packageService = TestBed.inject(PackageService);
    httpClient = TestBed.inject(HttpClient);
    httpHandler = TestBed.inject(HttpHandler);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
