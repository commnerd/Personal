import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateComponent } from './create.component';
import {HttpClientTestingModule} from "@angular/common/http/testing";
import {ResumeModule} from "@pages/resume/resume.module";
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";

describe('CreateComponent', () => {
  let component: CreateComponent;
  let fixture: ComponentFixture<CreateComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ ResumeModule, HttpClientTestingModule, BrowserAnimationsModule ],
      declarations: [ CreateComponent ]
    });
    fixture = TestBed.createComponent(CreateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
