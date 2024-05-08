import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormComponent } from './form.component';
import { HttpClientTestingModule } from "@angular/common/http/testing";
import { ResumeModule } from "@pages/resume/resume.module";
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";

describe('FormComponent', () => {
  let component: FormComponent;
  let fixture: ComponentFixture<FormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ResumeModule, HttpClientTestingModule, BrowserAnimationsModule],
      declarations: [FormComponent]
    });
    fixture = TestBed.createComponent(FormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
