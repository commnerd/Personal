import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormComponent } from './form.component';
import { PackageService } from '../../../services/models/composer/package.service';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { MatFormFieldModule } from '@angular/material/form-field';

describe('FormComponent', () => {
  let component: FormComponent;
  let fixture: ComponentFixture<FormComponent>;
  let packageService: PackageService
  let httpClient: HttpClient;
  let httpHandler: HttpHandler;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [MatFormFieldModule],
      providers: [PackageService, HttpClient, HttpHandler],
      declarations: [FormComponent]
    });
    fixture = TestBed.createComponent(FormComponent);
    component = fixture.componentInstance;
    packageService = TestBed.inject(PackageService);
    httpHandler = TestBed.inject(HttpHandler);
    httpClient = TestBed.inject(HttpClient);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
