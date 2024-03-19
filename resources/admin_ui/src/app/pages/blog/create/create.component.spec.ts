import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateComponent } from './create.component';
import {BlogModule} from "@pages/blog/blog.module";
import {HttpClientTestingModule, HttpTestingController} from "@angular/common/http/testing";
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";

describe('CreateComponent', () => {
  let component: CreateComponent;
  let fixture: ComponentFixture<CreateComponent>;
  let httpTestingController: HttpTestingController;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule, BlogModule, BrowserAnimationsModule],
      declarations: [CreateComponent]
    });
    fixture = TestBed.createComponent(CreateComponent);
    component = fixture.componentInstance;
    TestBed.inject(HttpTestingController);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
